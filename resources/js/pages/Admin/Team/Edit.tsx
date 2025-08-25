import AdminLayout from '@/layouts/admin-layout';
import { Head } from '@inertiajs/react';
import UpdateCompetitionInformationForm from './Partials/UpdateCompetitionInformationForm';

export default function Edit({ competitions }) {
    return (
        <AdminLayout
            header={
                <h2 className="text-xl font-semibold leading-tight text-gray-800">
                    Competitions
                </h2>
            }
        >
            <Head title="Competition" />

            <div className="py-12">
                <div className="mx-auto max-w-7xl space-y-6 sm:px-6 lg:px-8">

                    <div className="bg-white p-4 shadow sm:rounded-lg sm:p-8">
                        <UpdateCompetitionInformationForm className="max-w-xl" />
                    </div>

                    <div className="bg-white p-4 shadow sm:rounded-lg sm:p-8">
                        <DeleteCompetitionForm className="max-w-xl" />
                    </div>
                </div>
            </div>
        </AdminLayout>
    );
}
