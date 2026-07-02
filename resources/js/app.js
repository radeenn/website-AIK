import Alpine from 'alpinejs';
import { createIcons, icons } from 'lucide';

window.Alpine = Alpine;

const renderIcons = () => {
    requestAnimationFrame(() => createIcons({ icons }));
};

window.audioPlayer = () => ({
    playing: false,
    currentTime: 0,
    duration: 0,
    volume: 1,
    init() {
        const audio = this.$refs.audio;
        audio.addEventListener('loadedmetadata', () => { this.duration = Number.isFinite(audio.duration) ? audio.duration : 0; });
        audio.addEventListener('timeupdate', () => { this.currentTime = audio.currentTime; });
        audio.addEventListener('play', () => { this.playing = true; renderIcons(); });
        audio.addEventListener('pause', () => { this.playing = false; renderIcons(); });
        audio.addEventListener('ended', () => { this.playing = false; this.currentTime = 0; renderIcons(); });
    },
    async toggle() {
        const audio = this.$refs.audio;
        if (audio.paused) {
            document.querySelectorAll('audio').forEach((item) => { if (item !== audio) item.pause(); });
            try { await audio.play(); } catch (error) { console.warn('Audio belum dapat diputar:', error); }
        } else {
            audio.pause();
        }
    },
    seek() { this.$refs.audio.currentTime = Number(this.currentTime || 0); },
    setVolume() { this.$refs.audio.volume = Number(this.volume); },
    format(value) {
        if (!Number.isFinite(value)) return '0:00';
        const minutes = Math.floor(value / 60);
        const seconds = Math.floor(value % 60).toString().padStart(2, '0');
        return `${minutes}:${seconds}`;
    },
});

window.videoModal = () => ({
    visible: false,
    open() {
        this.visible = true;
        document.body.style.overflow = 'hidden';
        this.$nextTick(renderIcons);
    },
    close() {
        this.$refs.video?.pause();
        this.visible = false;
        document.body.style.overflow = '';
    },
});

window.movementProgress = (mode) => ({
    loading: true,
    completed: 0,
    percentage: 0,
    continueUrl: '#',
    init() {
        const key = `tuntun-progress-${mode}`;
        let progress = [];
        try { progress = JSON.parse(localStorage.getItem(key) || '[]'); } catch { progress = []; }
        const cards = [...document.querySelectorAll('[data-movement-order]')];
        cards.forEach((card) => {
            const order = Number(card.dataset.movementOrder);
            if (progress.includes(order)) card.classList.add('is-complete');
        });
        this.completed = progress.length;
        this.percentage = cards.length ? Math.min(100, Math.round((progress.length / Math.max(cards.length, 13)) * 100)) : 0;
        const lastOrder = progress.length ? Math.max(...progress) : 0;
        const nextCard = cards.find((card) => Number(card.dataset.movementOrder) > lastOrder) || cards[0];
        this.continueUrl = nextCard?.dataset.movementUrl || '#';
        setTimeout(() => { this.loading = false; renderIcons(); }, 280);
    },
});

window.movementPage = ({ nextUrl, mode, order }) => ({
    autoplay: false,
    favorite: false,
    nextUrl,
    mode,
    order,
    init() {
        this.autoplay = localStorage.getItem('tuntun-autoplay') === 'true';
        this.favorite = localStorage.getItem(`tuntun-favorite-${mode}-${order}`) === 'true';
        this.markProgress();

        const audios = [...this.$root.querySelectorAll('[data-audio-item] audio')];
        audios.forEach((audio, index) => {
            audio.addEventListener('ended', () => {
                if (!this.autoplay) return;
                const following = audios[index + 1];
                if (following) {
                    setTimeout(() => following.play().catch(() => {}), 650);
                } else if (this.nextUrl) {
                    setTimeout(() => { if (this.autoplay) window.location.href = this.nextUrl; }, 1800);
                }
            });
        });

        if (this.autoplay && audios[0]) {
            setTimeout(() => audios[0].play().catch(() => {}), 900);
        }
    },
    markProgress() {
        const key = `tuntun-progress-${this.mode}`;
        let progress = [];
        try { progress = JSON.parse(localStorage.getItem(key) || '[]'); } catch { progress = []; }
        if (!progress.includes(this.order)) progress.push(this.order);
        progress.sort((a, b) => a - b);
        localStorage.setItem(key, JSON.stringify(progress));
    },
    saveAutoplay() {
        localStorage.setItem('tuntun-autoplay', this.autoplay ? 'true' : 'false');
        if (this.autoplay) {
            const firstAudio = this.$root.querySelector('[data-audio-item] audio');
            firstAudio?.play().catch(() => {});
        } else {
            this.$root.querySelectorAll('audio').forEach((audio) => audio.pause());
        }
    },
    stopAutoplay() {
        this.autoplay = false;
        localStorage.setItem('tuntun-autoplay', 'false');
        this.$root.querySelectorAll('audio').forEach((audio) => audio.pause());
    },
    toggleFavorite() {
        this.favorite = !this.favorite;
        localStorage.setItem(`tuntun-favorite-${this.mode}-${this.order}`, this.favorite ? 'true' : 'false');
        renderIcons();
    },
});

window.mediaPreview = (initial = {}) => ({
    image: initial.image || null,
    video: initial.video || null,
    audio: initial.audio || null,
    externalVideo: Boolean(initial.video && /^https?:\/\//.test(initial.video)),
    replaceUrl(key, file) {
        if (this[key]?.startsWith?.('blob:')) URL.revokeObjectURL(this[key]);
        this[key] = file ? URL.createObjectURL(file) : null;
    },
    previewImage(event) { this.replaceUrl('image', event.target.files?.[0]); },
    previewVideo(event) { this.externalVideo = false; this.replaceUrl('video', event.target.files?.[0]); },
    previewAudio(event) { this.replaceUrl('audio', event.target.files?.[0]); },
});

Alpine.start();

document.addEventListener('DOMContentLoaded', renderIcons);
document.addEventListener('alpine:initialized', renderIcons);
