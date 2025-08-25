import { AdminContent } from '@/components/admin-content';
import { AppShell } from '@/components/app-shell';
import { AdminSidebar } from '@/components/admin-sidebar';
import { AdminSidebarHeader } from '@/components/admin-sidebar-header';
import { type BreadcrumbItem } from '@/types';
import { type PropsWithChildren } from 'react';

export default function AdminSidebarLayout({ children, breadcrumbs = [] }: PropsWithChildren<{ breadcrumbs?: BreadcrumbItem[] }>) {
    return (
        <AppShell variant="sidebar">
            <AdminSidebar />
            <AdminContent variant="sidebar" className="overflow-x-hidden">
                <AdminSidebarHeader breadcrumbs={breadcrumbs} />
                {children}
            </AdminContent>
        </AppShell>
    );
}
