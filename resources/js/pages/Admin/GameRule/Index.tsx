
import AppLayout from '@/layouts/app-layout';
import { Link, Head, router, usePage } from '@inertiajs/react';
import { useState } from 'react';
import { type GameRule } from '@/types';
import { type BreadcrumbItem } from '@/types';
import { columns } from './columns';
import { DataTable } from '@/components/ui/data-table';
import { CreateGameRuleModal } from "./partials/create-game-rule";

interface Props {
    rules: GameRule[];
}

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Settings/Rules',
        href: '/admin/settings/rules',
    },
];


export default function Index({ rules }: Props) {

    
    return (
        <AppLayout breadcrumbs={breadcrumbs}>

            <div className="py-12">
                <Head title="Game Rules" />
                <div className="mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div className="flex items-center gap-2 gy-4">
                        <CreateGameRuleModal />
                    </div>
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <DataTable columns={columns} data={rules} />
                    </div>
                </div>
            </div>
        </AppLayout>
    );
}