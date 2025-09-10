import AppTeamPickerLayoutTemplate from '@/layouts/app/app-team-picker-layout';
import { type BreadcrumbItem, Competition, Team } from '@/types';
import { type ReactNode } from 'react';

interface AppTeamPickerLayoutProps {
    children: ReactNode;
    breadcrumbs?: BreadcrumbItem[];
    leagues: Competition[];
    leagueTeams: Team[];
}

export default ({ children, breadcrumbs, leagues, leagueTeams, ...props }: AppTeamPickerLayoutProps) => (
    <AppTeamPickerLayoutTemplate breadcrumbs={breadcrumbs} leagues={leagues} leagueTeams={leagueTeams} {...props}>
        {children}
    </AppTeamPickerLayoutTemplate>
);
