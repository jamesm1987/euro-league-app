
import AppLayout from '@/layouts/app-layout';
import { Link, Head, router, usePage } from '@inertiajs/react';
import { useState } from 'react';
import { type Team } from '@/types';
import { type BreadcrumbItem } from '@/types';
import { columns } from './columns'
import { DataTable } from '@/components/ui/data-table'

interface Props {
    teams: Team[];
    filters: {
        competition?: string;
    }
}

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Teams',
        href: '/teams',
    },
];


export default function Index({ teams, filters }: Props) {

    const [competition, setCompetition] = useState(filters.competition || '');

    const handleFilter = () => {
        router.get(route('admin.competitions.index'), { competition }, { preserveState: true });
    };
    
    return (
        <AppLayout breadcrumbs={breadcrumbs}>

            <div className="py-12">
                <Head title="Teams" />
                <div className="mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div className="flex gap-4 mb-4">
                        
                        <select
                            value={competition}
                            onChange={(e) => setCompetition(e.target.value)}
                            className="border px-2 py-1"
                        >
                            <option value="">All Competitions</option>
                            <option value="league">League</option>
                            <option value="cup">Cup</option>
                        </select>
                        <button onClick={handleFilter} className="bg-blue-500 text-white px-3 py-1 rounded">
                            Filter
                        </button>
                    </div>
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <DataTable columns={columns} data={teams} />
                    </div>
                </div>
            </div>
        </AppLayout>
    );
}