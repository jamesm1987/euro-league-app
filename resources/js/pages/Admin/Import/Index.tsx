
import AdminLayout from '@/layouts/admin-layout';
import { Link, Head, router, usePage } from '@inertiajs/react';
import { useState } from 'react';
import { type Import } from '@/types';
import { type BreadcrumbItem } from '@/types';
import { columns } from './columns'
import { DataTable } from '@/components/ui/data-table'
import {
  Sheet,
  SheetTrigger,
  SheetContent,
  SheetHeader,
  SheetTitle,
  SheetDescription,
  SheetFooter,
  SheetClose,
} from '@/components/ui/sheet'
import { Button } from '@/components/ui/button'
import { Input } from '@/components/ui/input'
import { Label } from '@/components/ui/label'

interface Props {
    imports: Import[];
    filters: {
        type?: string;
    };
    settings?: {
        importType?: string;
    };
    
}

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Imports',
        href: '/admin/import',
    },
];


export default function Index({ imports, filters, settings = {} }: Props) {

    const [type, setType] = useState(filters.type || '');
    const [importType, setImportType] = useState(settings.importType || '');

    const handleFilter = () => {
        router.get(route('admin.import.index'), { type }, { preserveState: true });
    };

    return (
        <AdminLayout breadcrumbs={breadcrumbs}>

            <div className="py-12">
                <Head title="Imports" />
                <div className="mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div className="flex gap-4 mb-4">
                        
                        <select
                            value={type}
                            onChange={(e) => setType(e.target.value)}
                            className="border px-2 py-1"
                        >
                            <option value="">All Type</option>
                            <option value="teams">Teams</option>
                            <option value="fixtures">Fixture</option>
                            <option value="trophys">Trophy Winners</option>
                        </select>
                        <button onClick={handleFilter} className="bg-blue-500 text-white px-3 py-1 rounded">
                            Filter
                        </button>
                        
                        <Sheet>
                            <SheetTrigger asChild>
                                <Button variant="outline">New Import</Button>
                            </SheetTrigger>
                            <SheetContent>
                                <form
                                    onSubmit={(e) => {
                                    e.preventDefault();
                                    if (!importType) return;

                                    router.post(route('admin.imports.submit'), { type: importType }, {
                                        preserveScroll: true,
                                        onSuccess: () => {
                                        setImportType('');
                                        },
                                    });
                                    }}
                                    className="flex flex-col justify-between h-full"
                                >
                                    <div>
                                    <SheetHeader>
                                        <SheetTitle>Import</SheetTitle>
                                        <SheetDescription>Select an import type.</SheetDescription>
                                    </SheetHeader>

                                    <div className="p-4 space-y-4">
                                        <Label htmlFor="import-type">Type</Label>
                                        <select
                                        id="import-type"
                                        value={importType}
                                        onChange={(e) => setImportType(e.target.value)}
                                        required
                                        className="w-full border px-2 py-1"
                                        >
                                        <option value="">Select type...</option>
                                        <option value="teams">Teams</option>
                                        <option value="fixtures">Fixtures</option>
                                        <option value="trophys">Trophy Winners</option>
                                        </select>
                                    </div>
                                    </div>

                                    <SheetFooter className="p-4 border-t">
                                    <Button type="submit">Run Import</Button>
                                    <SheetClose asChild>
                                        <Button type="button" variant="outline">Cancel</Button>
                                    </SheetClose>
                                    </SheetFooter>
                                </form>
                            </SheetContent>

                        </Sheet>
                    </div>
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <DataTable columns={columns} data={imports} />
                    </div>
                </div>
            </div>
        </AdminLayout>
    );
}