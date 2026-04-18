import { Link } from '@inertiajs/react';
import { motion } from 'framer-motion';

type PollCardProps = {
    poll: {
        id: number;
        title: string;
        position: string;
        location: string;
        end_date: string;
    };
};

export default function PollCard({ poll }: PollCardProps) {
    return (
        <motion.article
            whileHover={{ y: -4, scale: 1.01 }}
            transition={{ duration: 0.2 }}
            className="rounded-3xl border border-white/40 bg-white/60 p-5 shadow-lg shadow-slate-900/5 backdrop-blur-xl"
        >
            <p className="text-xs uppercase tracking-[0.2em] text-slate-500">{poll.position}</p>
            <h3 className="mt-3 text-xl font-semibold text-slate-950">{poll.title}</h3>
            <p className="mt-3 text-sm text-slate-600">{poll.location}</p>
            <p className="mt-1 text-xs text-slate-500">Closes {poll.end_date}</p>
            <motion.div whileTap={{ scale: 0.98 }}>
                <Link href={`/polls/${poll.id}`} className="mt-5 inline-flex rounded-full bg-slate-950 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-slate-800">
                    Vote now
                </Link>
            </motion.div>
        </motion.article>
    );
}
