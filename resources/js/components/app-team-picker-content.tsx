
import * as React from 'react';

import {Team} from "@/types";

interface AppTeamPickerContentProps extends React.ComponentProps<'main'> {
    leagueTeams: Team[];
}

export function AppTeamPickerContent({leagueTeams, children, ...props }: AppTeamPickerContentProps) {

    return (
        <main className="max-w-7xl mx-auto px-6 py-8 grid grid-cols-1 md:grid-cols-12 gap-6" {...props}>
            {children}
        </main>
    );
}