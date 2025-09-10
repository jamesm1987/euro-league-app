"use client";

import { Competition } from '@/types';

interface AppLeaguesSidebarProps {
  leagues: Competition[];
  activeLeagueId: number;
  setActiveLeagueId: (id: number) => void;
  getSelectedCount: (leagueId: number) => number;
}

export function AppLeaguesSidebar({
  leagues,
  activeLeagueId,
  setActiveLeagueId,
  getSelectedCount,
}: AppLeaguesSidebarProps) {
  return (
    <aside className="col-span-12 md:col-span-3 bg-white rounded-xl shadow p-4 self-start">
      <h2 className="text-lg font-semibold mb-2">Leagues</h2>
      <p className="text-sm text-gray-500 mb-4">Select 2 teams from each league</p>

      {leagues.map((league) => (
        <button
          key={league.id}
          onClick={() => setActiveLeagueId(league.id)}
          className={`flex justify-between items-center w-full p-2 rounded-lg mb-2 transition-colors ${
            activeLeagueId === league.id
              ? "bg-emerald-100 font-medium text-emerald-800"
              : "bg-gray-50 hover:bg-gray-100"
          }`}
        >
          <div className="flex items-center gap-2">
            <img src={league.badge} alt={`${league.name} badge`} className="h-6 w-6" />
            <span>{league.name}</span>
          </div>
          <span className="text-sm font-medium text-gray-600">
            {getSelectedCount(league.id)}/2
          </span>
        </button>
      ))}
    </aside>
  );
}
