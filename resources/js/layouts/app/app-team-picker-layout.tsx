import { AppContent } from '@/components/app-content';
import { AppShell } from '@/components/app-shell';
import { AppLeaguesSidebar } from '@/components/app-leagues-sidebar';
import { AppTeamPickerSidebar } from '@/components/app-team-picker-sidebar';
import { AppSidebarHeader } from '@/components/app-sidebar-header';
import { type BreadcrumbItem } from '@/types';
import { type PropsWithChildren } from 'react';

export default function AppTeamPickerLayout({ children, breadcrumbs = [] }: PropsWithChildren<{ breadcrumbs?: BreadcrumbItem[] }>) {
    return (
        <AppShell variant="sidebar">
            <AppLeaguesSidebar />
            <AppContent variant="sidebar" className="overflow-x-hidden">
                <AppSidebarHeader breadcrumbs={breadcrumbs} />
                {children}
            </AppContent>
            <AppTeamPickerSidebar />
        </AppShell>
    );
}
