import AppTeamPickerLayout from '@/layouts/app-team-picker-layout';
import { type BreadcrumbItem, Team, Competition } from '@/types';
import { Head } from '@inertiajs/react';


const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Teams Picker',
        href: '/teams-picker',
    },
];

interface IndexProps {
    leagueTeams: Team[];
    leagues: Competition[],
    selected: number[],
    spent: number,
    budget: number
}


export default function Index({leagues, leagueTeams}: IndexProps) {
    
    return (
        <AppTeamPickerLayout breadcrumbs={breadcrumbs} leagues={leagues} leagueTeams={leagueTeams}>
            <Head title="Teams Picker" />
            <section className="col-span-12 md:col-span-6 bg-white rounded-xl shadow-sm p-6 max-h-[calc(100vh-160px)] overflow-y-auto">
                <h2 className="text-xl font-semibold mb-6">Select Your Teams</h2>

                {teams
            .filter((leagueGroup: LeagueTeams) => leagueGroup.league.id === activeLeagueId)
            .map((leagueGroup: teams) => (
              <div key={leagueGroup.league.id} className="mb-6">
                <h3 className="font-semibold mb-2">{leagueGroup.league.name}</h3>
                <div className="space-y-2">
                  {leagueGroup.teams.map((team: Team) => {

                    return (
                      <button
                        key={team.id}
                        onClick={() => toggleTeam(team)}
                        className={`flex items-center justify-between w-full p-3 rounded-lg border transition-colors hover:bg-gray-50
                        `}
                      >
                        <div className="flex items-center gap-3">
                    
                          <span className="font-medium">{team.name}</span>
                        </div>
                        <span className="text-sm text-gray-600">£{team.price}m</span>
                      </button>
                    );
                  })}
                </div>
              </div>
            ))}
            </section>
        </AppTeamPickerLayout>
    );
}
