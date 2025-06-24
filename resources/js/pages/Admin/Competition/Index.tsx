
import AuthLayout from '@/layouts/auth-layout';
import { Link, Head } from '@inertiajs/react';
import { type Competition } from '@/types';
import HeadingSmall from '@/components/heading-small';

interface Props {
    competitions: Competition[];
}

export default function Index({ competitions }: Props) {
    return (
        <AuthLayout title="Competitions" description="All competitions">
            <Head title="Competitions" />

            <div className="py-12">
                <HeadingSmall title="Competitions"/>
                <div className="mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <table className="min-w-full text-sm text-gray-900">
                            <thead className="bg-gray-100 text-left font-semibold">
                                <tr>
                                    <th className="px-6 py-4">Name</th>
                                    <th className="px-6 py-4">Type</th>
                                    <th className="px-6 py-4">Country</th>
                                    <th className="px-6 py-4">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                {competitions.map((comp) => (
                                    <tr key={comp.id} className="border-t">
                                        <td className="px-6 py-4">{comp.name}</td>
                                        <td className="px-6 py-4">{comp.type}</td>
                                        <td className="px-6 py-4">{comp.country}</td>
                                        <td className="px-6 py-4 space-x-2">
                                            <Link
                                                href={route('competitions.edit', comp.id)}
                                                className="text-blue-600 hover:underline"
                                            >
                                                Edit
                                            </Link>
                                            <Link
                                                method="delete"
                                                href={route('competitions.destroy', comp.id)}
                                                as="button"
                                                className="text-red-600 hover:underline"
                                            >
                                                Delete
                                            </Link>
                                        </td>
                                    </tr>
                                ))}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </AuthLayout>
    );
}