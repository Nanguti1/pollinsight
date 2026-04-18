import { Link } from '@inertiajs/react';

export default function Footer() {
    return (
        <footer className="mt-16 border-t border-white/40 bg-white/50 backdrop-blur-xl">
            <div className="mx-auto grid w-full max-w-6xl gap-6 px-6 py-10 md:grid-cols-2">
                <div>
                    <p className="text-sm font-semibold text-slate-900">PollInsight Kenya</p>
                    <p className="mt-2 max-w-md text-sm text-slate-600">
                        A centralized platform for tracking political aspirants and public opinion across Kenya through structured polls and live analytics.
                    </p>
                </div>
                <div className="flex gap-4 text-sm text-slate-700 md:justify-end">
                    <Link href="/" className="hover:text-slate-950">Home</Link>
                    <Link href="/polls" className="hover:text-slate-950">Polls</Link>
                    <Link href="/about" className="hover:text-slate-950">About</Link>
                    <Link href="/contact" className="hover:text-slate-950">Contact</Link>
                </div>
            </div>
            <div className="border-t border-white/40 py-4 text-center text-xs text-slate-500">
                © {new Date().getFullYear()} PollInsight Kenya. All rights reserved.
            </div>
        </footer>
    );
}
