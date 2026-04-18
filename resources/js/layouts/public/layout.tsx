import { AnimatePresence, motion } from 'framer-motion';
import { usePage } from '@inertiajs/react';
import Footer from '@/components/public/footer';
import Navbar from '@/components/public/navbar';

export default function PublicLayout({ children }: { children: React.ReactNode }) {
    const page = usePage();

    return (
        <div className="min-h-screen bg-gradient-to-b from-slate-50 via-white to-slate-100 text-slate-900">
            <Navbar />
            <AnimatePresence mode="wait">
                <motion.main
                    key={page.url}
                    initial={{ opacity: 0, y: 10 }}
                    animate={{ opacity: 1, y: 0 }}
                    exit={{ opacity: 0, y: -10 }}
                    transition={{ duration: 0.25 }}
                    className="mx-auto w-full max-w-6xl px-6 py-10"
                >
                    {children}
                </motion.main>
            </AnimatePresence>
            <Footer />
        </div>
    );
}
