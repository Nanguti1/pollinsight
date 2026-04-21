import { Head, Link } from '@inertiajs/react';
import { AnimatePresence, motion } from 'framer-motion';
import { useEffect, useMemo, useState } from 'react';
import PollCard from '@/components/public/poll-card';

type Slide = {
    id: number;
    title: string;
    subtitle: string;
    cta: string;
    href: string;
    background: string;
};

const heroSlides: Slide[] = [
    {
        id: 1,
        title: 'Track political sentiment in real time across Kenya',
        subtitle: 'Structured polls, trusted insights, and county-level visibility for civic conversations.',
        cta: 'View active polls',
        href: '/polls',
        background: 'from-[#040B46] via-[#07145E] to-[#0A2C7B]',
    },
    {
        id: 2,
        title: 'Compare aspirants by county, constituency, and ward',
        subtitle: 'See how public opinion shifts across geography and positions before election day.',
        cta: 'View rankings',
        href: '/rankings',
        background: 'from-[#0B1B5A] via-[#122B7A] to-[#19439E]',
    },
    {
        id: 3,
        title: 'Explore active polls and cast your vote anonymously',
        subtitle: 'Fast voting experience powered by anti-duplicate integrity controls.',
        cta: 'View active polls',
        href: '/polls',
        background: 'from-[#05103D] via-[#0A1D64] to-[#12358D]',
    },
];

export default function Welcome({
    activePolls,
    pollsPerCounty,
}: {
    activePolls: { id: number; title: string; position: string; location: string; end_date: string }[];
    pollsPerCounty: { county_name: string; poll_count: number }[];
}) {
    const [activeSlide, setActiveSlide] = useState(0);

    useEffect(() => {
        const interval = window.setInterval(() => {
            setActiveSlide((value) => (value + 1) % heroSlides.length);
        }, 6000);

        return () => {
            window.clearInterval(interval);
        };
    }, []);

    const currentSlide = useMemo(() => heroSlides[activeSlide], [activeSlide]);

    return (
        <>
            <Head title="Home" />

            <section className="relative overflow-hidden rounded-[5px] shadow-2xl">
                <AnimatePresence mode="wait">
                    <motion.div
                        key={currentSlide.id}
                        initial={{ opacity: 0 }}
                        animate={{ opacity: 1 }}
                        exit={{ opacity: 0 }}
                        transition={{ duration: 0.6, ease: 'easeInOut' }}
                        className={`relative min-h-[440px] bg-gradient-to-r ${currentSlide.background}`}
                    >
                        <div className="absolute inset-0 bg-[radial-gradient(circle_at_70%_30%,rgba(56,189,248,0.25),transparent_45%)]" />
                        <div className="relative mx-auto flex min-h-[440px] w-full max-w-7xl items-center px-6 py-12 md:px-10">
                            <div className="max-w-2xl text-white">
                                <p className="text-sm uppercase tracking-[0.28em] text-white/70">PollInsight Kenya</p>
                                <h1 className="mt-4 text-4xl font-semibold leading-tight md:text-6xl">{currentSlide.title}</h1>
                                <p className="mt-5 text-lg text-white/80">{currentSlide.subtitle}</p>
                                <Link href={currentSlide.href} className="mt-8 inline-flex rounded-[5px] border border-white/40 bg-white/10 px-6 py-3 text-sm font-semibold text-white transition hover:bg-white/20">
                                    {currentSlide.cta}
                                </Link>
                            </div>
                        </div>
                    </motion.div>
                </AnimatePresence>

                <div className="absolute bottom-5 left-1/2 flex -translate-x-1/2 gap-2">
                    {heroSlides.map((slide, index) => (
                        <button
                            key={slide.id}
                            type="button"
                            onClick={() => setActiveSlide(index)}
                            className={`h-2.5 w-9 rounded-full transition ${index === activeSlide ? 'bg-white' : 'bg-white/40 hover:bg-white/60'}`}
                            aria-label={`Go to slide ${index + 1}`}
                        />
                    ))}
                </div>
            </section>

            <section className="mt-14">
                <div className="text-center">
                    <p className="text-sm uppercase tracking-[0.25em] text-slate-500">Our work</p>
                    <h2 className="mt-2 text-4xl font-semibold text-slate-900">Polls per county</h2>
                </div>

                <div className="mt-8 grid gap-5 md:grid-cols-2 lg:grid-cols-4">
                    {pollsPerCounty.map((county, index) => (
                        <motion.div
                            key={county.county_name}
                            initial={{ opacity: 0, y: 10 }}
                            whileInView={{ opacity: 1, y: 0 }}
                            viewport={{ once: true }}
                            transition={{ duration: 0.35, delay: index * 0.04 }}
                            className="rounded-[5px] border border-slate-200 bg-white p-5 shadow-sm"
                        >
                            <p className="text-sm uppercase tracking-[0.12em] text-slate-500">County</p>
                            <p className="mt-2 text-xl font-semibold text-slate-900">{county.county_name}</p>
                            <p className="mt-3 text-sm text-slate-600">{county.poll_count} active poll{county.poll_count > 1 ? 's' : ''}</p>
                        </motion.div>
                    ))}
                    {pollsPerCounty.length === 0 && <p className="text-center text-sm text-slate-600 md:col-span-2 lg:col-span-4">No active county-based polls yet.</p>}
                </div>
            </section>

            <section className="mt-14">
                <div className="mb-5 flex items-end justify-between gap-3">
                    <div>
                        <h2 className="text-2xl font-semibold text-slate-950">Featured active polls</h2>
                        <p className="text-sm text-slate-600">Participate in the latest national and county opinion polls.</p>
                    </div>
                    <Link href="/polls" className="text-sm font-semibold text-slate-700 underline underline-offset-4">See all</Link>
                </div>

                {activePolls.length > 0 ? (
                    <div className="grid gap-5 md:grid-cols-2 lg:grid-cols-3">
                        {activePolls.slice(0, 3).map((poll) => (
                            <PollCard key={poll.id} poll={poll} />
                        ))}
                    </div>
                ) : (
                    <div className="rounded-[5px] border border-slate-200 bg-white p-6 text-sm text-slate-600">No active polls right now. Please check back soon.</div>
                )}
            </section>

            <section className="relative mt-16 overflow-hidden rounded-t-[8px] bg-[#15184B] px-6 py-16 text-white md:px-12">
                <div className="mx-auto max-w-5xl">
                    <h3 className="text-center text-5xl font-semibold">Get Started Now!</h3>
                    <p className="mt-4 text-center text-2xl text-white/80">Subscribe for poll updates and weekly insights.</p>
                    <form className="mt-10 grid gap-4 md:grid-cols-2">
                        <input type="text" placeholder="Enter your name" className="h-14 rounded-[5px] bg-white px-4 text-slate-900 outline-none" />
                        <input type="email" placeholder="Enter E-mail address" className="h-14 rounded-[5px] bg-white px-4 text-slate-900 outline-none" />
                    </form>
                </div>
            </section>
        </>
    );
}
