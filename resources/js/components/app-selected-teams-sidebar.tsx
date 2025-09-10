"use client";

import { Team } from "@/types";
import { X } from "lucide-react";

interface SelectedTeamsSidebarProps {
  selected: Team[];
  toggleTeam: (team: Team) => void;
  remaining: number;
}

export function AppSelectedTeamsSidebar({
  selected,
  toggleTeam,
  remaining,
}: SelectedTeamsSidebarProps) {
  return (
    <aside className="col-span-12 md:col-span-3 bg-white rounded-xl shadow-sm p-4 self-start">
      <h2 className="text-lg font-semibold mb-4">
        {selected.length} / 10 Teams
      </h2>
      <div className="space-y-2 max-h-[400px] overflow-y-auto pr-2">
        {selected.map((team: Team) => (
          <div
            key={team.id}
            className="flex items-center justify-between p-2 rounded-lg bg-emerald-50 border border-emerald-100"
          >
            <div className="flex items-center gap-3">
              <img src={team.name} alt={`${team.name} badge`} className="h-5 w-5" />
              <div className="flex flex-col">
                <span className="font-medium">{team.name}</span>
                <span className="text-sm text-gray-600">£{team.price}m</span>
              </div>
            </div>
            <button
              onClick={() => toggleTeam(team)}
              className="text-red-500 hover:text-red-700 ml-3"
            >
              <X size={18} strokeWidth={2.5} />
            </button>
          </div>
        ))}
      </div>

      <button
        className="mt-6 w-full bg-emerald-600 hover:bg-emerald-700 text-white rounded-lg p-3 font-semibold disabled:bg-gray-300 disabled:cursor-not-allowed"
        disabled={selected.length !== 10 || remaining < 0}
      >
        Confirm Selection
      </button>
    </aside>
  );
}