import { Link } from '@inertiajs/react';
import { AnimatePresence, motion } from 'framer-motion';
import { Menu, X } from 'lucide-react';
import { useState } from 'react';
import { useCurrentUrl } from '@/hooks/use-current-url';

const navigationLinks = [
    { title: 'Home', href: '/' },
    { title: 'Polls', href: '/polls' },
    { title: 'About', href: '/about' },
    { title: 'Contact', href: '/contact' },
];

export default function Navbar() {
    const [isOpen, setIsOpen] = useState(false);
    const { isCurrentOrParentUrl } = useCurrentUrl();

    return (
        <header className="sticky top-0 z-40 border-b border-white/30 bg-white/65 backdrop-blur-xl">
            <div className="mx-auto flex w-full max-w-6xl items-center justify-between px-6 py-4">
                <Link href="/" className="font-semibold tracking-tight text-slate-950">
                    PollInsight Kenya
                </Link>

                <nav className="hidden items-center gap-2 md:flex">
                    {navigationLinks.map((item) => {
                        const isActive = item.href === '/' ? isCurrentOrParentUrl(item.href) && !isCurrentOrParentUrl('/polls') : isCurrentOrParentUrl(item.href);

                        return (
                            <Link
                                key={item.href}
                                href={item.href}
                                className={`rounded-full px-4 py-2 text-sm transition duration-200 ${isActive ? 'bg-slate-950 text-white shadow-lg shadow-slate-900/20' : 'text-slate-700 hover:bg-slate-100'}`}
                            >
                                {item.title}
                            </Link>
                        );
                    })}
                </nav>

                <motion.button
                    whileTap={{ scale: 0.95 }}
                    type="button"
                    onClick={() => setIsOpen((value) => !value)}
                    className="rounded-xl border border-slate-200 bg-white p-2 text-slate-700 md:hidden"
                >
                    {isOpen ? <X size={18} /> : <Menu size={18} />}
                </motion.button>
            </div>

            <AnimatePresence initial={false}>
                {isOpen && (
                    <motion.div
                        initial={{ opacity: 0, height: 0 }}
                        animate={{ opacity: 1, height: 'auto' }}
                        exit={{ opacity: 0, height: 0 }}
                        transition={{ duration: 0.2 }}
                        className="overflow-hidden border-t border-white/30 bg-white/90 md:hidden"
                    >
                        <div className="mx-auto flex w-full max-w-6xl flex-col gap-2 px-6 py-4">
                            {navigationLinks.map((item) => (
                                <Link
                                    key={item.href}
                                    href={item.href}
                                    onClick={() => setIsOpen(false)}
                                    className="rounded-xl px-3 py-2 text-sm text-slate-700 transition hover:bg-slate-100"
                                >
                                    {item.title}
                                </Link>
                            ))}
                        </div>
                    </motion.div>
                )}
            </AnimatePresence>
        </header>
    );
}
