
import AdminLayout from '@/layouts/admin-layout';
import { Link, Head, router, usePage } from '@inertiajs/react';
import { useState } from 'react';
import { type Fixture } from '@/types';
import { type BreadcrumbItem } from '@/types';
import { columns } from './columns'
import { DataTable } from '@/components/ui/data-table'

interface Props {
    fixtures: Fixture[];
    filters: {
        league?: string;
    }
}

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Fixtures',
        href: '/admin/fixtures',
    },
];


export default function Index({ fixtures, filters }: Props) {


    const [league, setLeague] = useState(filters.league || '');

    const handleFilter = () => {
        router.get(route('admin.fixtures.index'), { league }, { preserveState: true });
    };
    
    return (
        <AdminLayout breadcrumbs={breadcrumbs}>

            <div className="py-12">
                <Head title="Competitions" />
                <div className="mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div className="flex gap-4 mb-4">
                        
                        <select
                            value={league}
                            onChange={(e) => setLeague(e.target.value)}
                            className="border px-2 py-1"
                        >
                            <option value="">All Types</option>
                            <option value="league">League</option>
                            <option value="cup">Cup</option>
                        </select>
                        <button onClick={handleFilter} className="bg-blue-500 text-white px-3 py-1 rounded">
                        Filter
                        </button>
                    </div>
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <DataTable columns={columns} data={fixtures.data} />
                    </div>
                </div>
            </div>
        </AdminLayout>
    );
}