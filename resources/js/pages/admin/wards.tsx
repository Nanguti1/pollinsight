import { Head } from '@inertiajs/react';
import { motion } from 'framer-motion';
import { useMemo, useState } from 'react';

export default function AdminWards({ wards, constituencies }: { wards: any[]; constituencies: any[] }) {
    const [search, setSearch] = useState('');
    const [query, setQuery] = useState('');
    const [showMore, setShowMore] = useState(false);
    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';

    const filteredWards = useMemo(() => {
        const source = query ? wards.filter((item) => `${item.name} ${item.constituency?.name || ''} ${item.constituency?.county?.name || ''}`.toLowerCase().includes(query.toLowerCase())) : wards;

        return showMore || query ? source : source.slice(0, 12);
    }, [wards, query, showMore]);

    return (
        <>
            <Head title="Wards" />
            <motion.div initial={{ opacity: 0, y: 12 }} animate={{ opacity: 1, y: 0 }} transition={{ duration: 0.35 }} className="space-y-5">
                <div className="rounded-[5px] border border-white/10 bg-white/60 p-6 shadow-sm backdrop-blur-xl">
                    <p className="text-sm uppercase tracking-[0.3em] text-slate-500">Geography management</p>
                    <h1 className="mt-3 text-3xl font-semibold text-slate-950">Wards</h1>
                </div>

                <div className="grid gap-5 xl:grid-cols-[1fr_0.8fr]">
                    <motion.section layout className="rounded-[5px] border border-white/10 bg-slate-950/5 p-6 shadow-sm backdrop-blur-xl">
                        <div className="flex flex-wrap items-center justify-between gap-3">
                            <h2 className="text-xl font-semibold text-slate-950">Wards</h2>
                            <form
                                onSubmit={(event) => {
                                    event.preventDefault();
                                    setQuery(search);
                                }}
                                className="flex gap-2"
                            >
                                <input value={search} onChange={(event) => setSearch(event.target.value)} placeholder="Search ward / constituency / county" className="rounded-[5px] border border-slate-200 bg-white px-3 py-2 text-sm" />
                                <button type="submit" className="rounded-[5px] bg-slate-950 px-3 py-2 text-sm font-semibold text-white">Search</button>
                            </form>
                        </div>
                        <div className="mt-5 grid gap-3">
                            {filteredWards.map((ward: any) => (
                                <div key={ward.id} className="rounded-[5px] bg-white/60 p-4 shadow-sm">
                                    <form action={`/admin/wards/${ward.id}`} method="post" className="space-y-3">
                                        <input type="hidden" name="_token" value={csrfToken} />
                                        <input type="hidden" name="_method" value="put" />
                                        <input defaultValue={ward.name} name="name" className="w-full rounded-[5px] border border-slate-200 bg-white px-3 py-2 text-sm font-semibold text-slate-950" />
                                        <select defaultValue={ward.constituency_id} name="constituency_id" className="w-full rounded-[5px] border border-slate-200 bg-white px-3 py-2 text-sm">
                                            {constituencies.map((constituency) => (
                                                <option key={constituency.id} value={constituency.id}>{constituency.name} ({constituency.county?.name})</option>
                                            ))}
                                        </select>
                                        <div className="flex justify-end gap-2">
                                            <button type="submit" className="rounded-[5px] bg-slate-950 px-3 py-1.5 text-xs font-semibold text-white">Save</button>
                                            <button formAction={`/admin/wards/${ward.id}`} formMethod="post" name="_method" value="delete" className="rounded-[5px] border border-rose-300 px-3 py-1.5 text-xs font-semibold text-rose-600">Delete</button>
                                        </div>
                                    </form>
                                </div>
                            ))}
                        </div>
                        {!query && wards.length > 12 && (
                            <button type="button" onClick={() => setShowMore((value) => !value)} className="mt-4 rounded-[5px] border border-slate-300 px-3 py-2 text-sm font-medium text-slate-700">
                                {showMore ? 'Show less' : 'Show more'}
                            </button>
                        )}
                    </motion.section>

                    <motion.section layout className="rounded-[5px] border border-white/10 bg-white/60 p-6 shadow-sm backdrop-blur-xl">
                        <h2 className="text-xl font-semibold text-slate-950">Add new ward</h2>
                        <form action="/admin/wards" method="post" className="mt-6 space-y-4">
                            <input type="hidden" name="_token" value={csrfToken} />
                            <div>
                                <label className="block text-sm font-medium text-slate-700">Name</label>
                                <input name="name" className="mt-2 w-full rounded-[5px] border border-slate-200 bg-white/80 px-4 py-3 text-sm" />
                            </div>
                            <div>
                                <label className="block text-sm font-medium text-slate-700">Constituency</label>
                                <select name="constituency_id" className="mt-2 w-full rounded-[5px] border border-slate-200 bg-white/80 px-4 py-3 text-sm">
                                    <option value="">Select constituency</option>
                                    {constituencies.map((constituency) => (
                                        <option key={constituency.id} value={constituency.id}>{constituency.name} ({constituency.county?.name})</option>
                                    ))}
                                </select>
                            </div>
                            <button type="submit" className="inline-flex items-center justify-center rounded-[5px] bg-slate-950 px-5 py-3 text-sm font-semibold text-white transition hover:bg-slate-800">Add ward</button>
                        </form>
                    </motion.section>
                </div>
            </motion.div>
        </>
    );
}
