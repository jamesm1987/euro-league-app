"use client";

import { useState } from "react";
import { AppLeaguesSidebar } from "@/components/app-leagues-sidebar";
import { AppSelectedTeamsSidebar } from "@/components/app-selected-teams-sidebar";
import { AppSidebarHeader } from "@/components/app-sidebar-header";
import { type BreadcrumbItem, type Competition, type Team } from "@/types";
import { AppShell } from "@/components/app-shell";

interface AppTeamPickerLayoutProps {
  breadcrumbs?: BreadcrumbItem[];
  leagues: Competition[];
  leagueTeams: Team[];
  children?: React.ReactNode;
}

export default function AppTeamPickerLayout({
  breadcrumbs = [],
  leagues,
  leagueTeams,
  children,
}: AppTeamPickerLayoutProps) {
  // --- State ---
  const [selectedTeams, setSelectedTeams] = useState<Team[]>([]);
  const [activeLeagueId, setActiveLeagueId] = useState<number>(leagues[0]?.id ?? 0);

  // --- Callbacks ---
  const toggleTeamSelection = (team: Team) => {
    setSelectedTeams(prev => {
      const isSelected = prev.some(t => t.id === team.id);
      if (isSelected) return prev.filter(t => t.id !== team.id);
      return [...prev, team];
    });
  };

  const getSelectedCount = (leagueId: number) =>
    selectedTeams.filter(team => team.league.id === leagueId).length;

  // --- Budget ---
  const budget = 125;
  const spent = selectedTeams.reduce((sum, t) => sum + t.price, 0);
  const remaining = budget - spent;

  return (
    <AppShell>
      {/* Sidebar with leagues */}
      <AppLeaguesSidebar
        leagues={leagues}
        activeLeagueId={activeLeagueId}
        setActiveLeagueId={setActiveLeagueId}
        getSelectedCount={getSelectedCount}
      />

      {/* Main content */}
      <main className="max-w-7xl mx-auto px-6 py-8 grid grid-cols-1 md:grid-cols-12 gap-6">
        <AppSidebarHeader breadcrumbs={breadcrumbs} />

        <section className="col-span-12 md:col-span-6 bg-white rounded-xl shadow-sm p-6 max-h-[calc(100vh-160px)] overflow-y-auto">
          {leagueTeams
            .filter(group => group.league.id === activeLeagueId)
            .map(group => (
              <div key={group.league.id} className="mb-6">
                <h3 className="font-semibold mb-2">{group.league.name}</h3>
                <div className="space-y-2">
                  {group.teams.map(team => (
                    <button
                      key={team.id}
                      onClick={() => toggleTeamSelection(team)}
                      className={`flex items-center justify-between w-full p-3 rounded-lg border transition-colors hover:bg-gray-50 ${
                        selectedTeams.some(t => t.id === team.id)
                          ? "bg-emerald-100 border-emerald-400"
                          : ""
                      }`}
                    >
                      <span className="font-medium">{team.name}</span>
                      <span className="text-sm text-gray-600">£{team.price}m</span>
                    </button>
                  ))}
                </div>
              </div>
            ))}
        </section>

        {/* Selected teams & budget */}
        <AppSelectedTeamsSidebar
          selected={selectedTeams}
          toggleTeam={toggleTeamSelection}
          remaining={remaining}
        />
      </main>

      {/* Any children passed in */}
      {children}
    </AppShell>
  );
}
