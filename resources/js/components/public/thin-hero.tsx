import { motion } from 'framer-motion';

type ThinHeroProps = {
    eyebrow: string;
    title: string;
    description: string;
};

export default function ThinHero({ eyebrow, title, description }: ThinHeroProps) {
    return (
        <motion.section
            initial={{ opacity: 0, y: 10 }}
            animate={{ opacity: 1, y: 0 }}
            className="relative overflow-hidden rounded-3xl border border-slate-200 bg-gradient-to-r from-[#040B46] via-[#0B1B5A] to-[#12358D] px-6 py-8 text-white shadow-xl md:px-10 md:py-10"
        >
            <div className="absolute inset-0 bg-[radial-gradient(circle_at_75%_15%,rgba(56,189,248,0.35),transparent_45%)]" />
            <div className="relative max-w-3xl">
                <p className="text-xs uppercase tracking-[0.28em] text-white/70">{eyebrow}</p>
                <h1 className="mt-3 text-3xl font-semibold tracking-tight md:text-4xl">{title}</h1>
                <p className="mt-3 text-sm leading-7 text-white/85 md:text-base">{description}</p>
            </div>
        </motion.section>
    );
}
