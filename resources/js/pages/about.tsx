import { Head } from '@inertiajs/react';
import ThinHero from '@/components/public/thin-hero';

export default function AboutPage({ aboutContent }: { aboutContent: string }) {
    return (
        <>
            <Head title="About" />

            <ThinHero
                eyebrow="About us"
                title="Who we are"
                description="PollInsight Kenya delivers trusted, anonymous polling so communities can track political sentiment with clarity."
            />

            <section className="mt-6 rounded-3xl border border-white/40 bg-white/65 p-8 shadow-xl backdrop-blur-xl md:p-12">
                <p className="max-w-3xl whitespace-pre-line text-base leading-8 text-slate-700">{aboutContent}</p>
            </section>
        </>
    );
}
