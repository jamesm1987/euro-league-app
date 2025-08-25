import AppTeamPickerLayoutTemplate from '@/layouts/app/app-team-picker-layout';
import { type BreadcrumbItem } from '@/types';
import { type ReactNode } from 'react';

interface ThreeColLayoutProps {
    children: ReactNode;
    breadcrumbs?: BreadcrumbItem[];
}

export default ({ children, breadcrumbs, ...props }: ThreeColLayoutProps) => (
    <AppTeamPickerLayoutTemplate breadcrumbs={breadcrumbs} {...props}>
        {children}
    </AppTeamPickerLayoutTemplate>
);
