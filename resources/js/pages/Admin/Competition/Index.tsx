
import AdminLayout from '@/layouts/admin-layout';
import { Link, Head, router, usePage } from '@inertiajs/react';
import { useState } from 'react';
import { type Competition } from '@/types';
import { type BreadcrumbItem } from '@/types';
import { columns } from './columns'
import { DataTable } from '@/components/ui/data-table'

interface Props {
    competitions: Competition[];
    filters: {
        type?: string;
    }
}

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Competitions',
        href: '/competitions',
    },
];


export default function Index({ competitions, filters }: Props) {

    const [type, setType] = useState(filters.type || '');

    const handleFilter = () => {
        router.get(route('admin.competitions.index'), { type }, { preserveState: true });
    };
    
    return (
        <AdminLayout breadcrumbs={breadcrumbs}>

            <div className="py-12">
                <Head title="Competitions" />
                <div className="mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div className="flex gap-4 mb-4">
                        
                        <select
                            value={type}
                            onChange={(e) => setType(e.target.value)}
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
                        <DataTable columns={columns} data={competitions} />
                    </div>
                </div>
            </div>
        </AdminLayout>
    );
}