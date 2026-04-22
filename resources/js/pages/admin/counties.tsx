import { Head } from '@inertiajs/react';
import { motion } from 'framer-motion';
import { useMemo, useState } from 'react';

const priorityCounties = ['nairobi city', 'mombasa', 'kiambu', 'kajiado', 'nakuru', 'kisumu', "murang'a", 'machakos'];

export default function AdminCounties({ counties }: { counties: any[] }) {
    const [search, setSearch] = useState('');
    const [query, setQuery] = useState('');
    const [showMore, setShowMore] = useState(false);
    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';

    const filteredCounties = useMemo(() => {
        if (query) {
            return counties.filter((county) => county.name.toLowerCase().includes(query.toLowerCase()));
        }

        const prioritized = counties.filter((county) => priorityCounties.includes(county.name.toLowerCase()));
        const remaining = counties.filter((county) => !priorityCounties.includes(county.name.toLowerCase()));

        return showMore ? [...prioritized, ...remaining] : prioritized;
    }, [counties, query, showMore]);

    return (
        <>
            <Head title="Counties" />
            <motion.div initial={{ opacity: 0, y: 12 }} animate={{ opacity: 1, y: 0 }} transition={{ duration: 0.35 }} className="space-y-5">
                <div className="rounded-[5px] border border-white/10 bg-white/60 p-6 shadow-sm backdrop-blur-xl">
                    <p className="text-sm uppercase tracking-[0.3em] text-slate-500">Geography management</p>
                    <h1 className="mt-3 text-3xl font-semibold text-slate-950">Counties</h1>
                </div>

                <div className="grid gap-5 xl:grid-cols-[1fr_0.8fr]">
                    <motion.section layout className="rounded-[5px] border border-white/10 bg-slate-950/5 p-6 shadow-sm backdrop-blur-xl">
                        <div className="flex flex-wrap items-center justify-between gap-3">
                            <h2 className="text-xl font-semibold text-slate-950">Counties</h2>
                            <form
                                onSubmit={(event) => {
                                    event.preventDefault();
                                    setQuery(search);
                                }}
                                className="flex gap-2"
                            >
                                <input value={search} onChange={(event) => setSearch(event.target.value)} placeholder="Search county" className="rounded-[5px] border border-slate-200 bg-white px-3 py-2 text-sm" />
                                <button type="submit" className="rounded-[5px] bg-slate-950 px-3 py-2 text-sm font-semibold text-white">Search</button>
                            </form>
                        </div>
                        <div className="mt-5 grid gap-3">
                            {filteredCounties.map((county: any) => (
                                <div key={county.id} className="rounded-[5px] bg-white/60 p-4 shadow-sm">
                                    <form action={`/admin/counties/${county.id}`} method="post" className="space-y-3">
                                        <input type="hidden" name="_token" value={csrfToken} />
                                        <input type="hidden" name="_method" value="put" />
                                        <input defaultValue={county.name} name="name" className="w-full rounded-[5px] border border-slate-200 bg-white px-3 py-2 text-sm font-semibold text-slate-950" />
                                        <div className="flex items-center justify-between gap-2">
                                            <p className="text-sm text-slate-600">{county.constituencies?.length ?? 0} constituencies</p>
                                            <div className="flex gap-2">
                                                <button type="submit" className="rounded-[5px] bg-slate-950 px-3 py-1.5 text-xs font-semibold text-white">Save</button>
                                                <button formAction={`/admin/counties/${county.id}`} formMethod="post" name="_method" value="delete" className="rounded-[5px] border border-rose-300 px-3 py-1.5 text-xs font-semibold text-rose-600">Delete</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            ))}
                        </div>
                        {!query && counties.length > 8 && (
                            <button type="button" onClick={() => setShowMore((value) => !value)} className="mt-4 rounded-[5px] border border-slate-300 px-3 py-2 text-sm font-medium text-slate-700">
                                {showMore ? 'Show less' : 'Show more'}
                            </button>
                        )}
                    </motion.section>

                    <motion.section layout className="rounded-[5px] border border-white/10 bg-white/60 p-6 shadow-sm backdrop-blur-xl">
                        <h2 className="text-xl font-semibold text-slate-950">Add new county</h2>
                        <form action="/admin/counties" method="post" className="mt-6 space-y-4">
                            <input type="hidden" name="_token" value={csrfToken} />
                            <div>
                                <label className="block text-sm font-medium text-slate-700">Name</label>
                                <input name="name" className="mt-2 w-full rounded-[5px] border border-slate-200 bg-white/80 px-4 py-3 text-sm" />
                            </div>
                            <button type="submit" className="inline-flex items-center justify-center rounded-[5px] bg-slate-950 px-5 py-3 text-sm font-semibold text-white transition hover:bg-slate-800">Add county</button>
                        </form>
                    </motion.section>
                </div>
            </motion.div>
        </>
    );
}
