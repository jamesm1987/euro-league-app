"use client";

import * as React from "react";
import { Link, Head, router,usePage } from "@inertiajs/react";
import AdminLayout from "@/layouts/admin-layout";
import { type BreadcrumbItem, Team, Competition } from "@/types";
import { teamColumns } from "./columns";
import { DataTable } from "@/components/ui/data-table";
import { Input } from "@/components/ui/input";
import { Select, SelectTrigger, SelectContent, SelectItem, SelectValue } from "@/components/ui/select";
import { ColumnFiltersState, SortingState } from "@tanstack/react-table";

interface IndexProps {
  teams: Team[];
  leagues: Competition[];
}

const breadcrumbs: BreadcrumbItem[] = [
  {
    title: "Users",
    href: "/users/",
  },
];

export default function Index({ teams, leagues }: IndexProps) {
  const [sorting, setSorting] = React.useState<SortingState>([]);
  const [columnFilters, setColumnFilters] = React.useState<ColumnFiltersState>([]);

  const nameFilter = columnFilters.find((f) => f.id === "name")?.value as string || "";
  const leagueFilter = columnFilters.find((f) => f.id === "league")?.value as string || "";

  const handleViewTeam = (team: Team) => {
    router.get(`/admin/teams/${team.id}`)
  };

  return (
    <AdminLayout breadcrumbs={breadcrumbs}>
      <div className="py-12">
        <Head title="Teams" />
        <div className="mx-auto max-w-7xl sm:px-6 lg:px-8 flex flex-col gap-4">
          <div className="flex items-center justify-between">
            {/* Filters */}
            <div className="flex items-center gap-2 flex-1">
              {/* Name search */}
              <Input
                placeholder="Search teams..."
                value={nameFilter}
                onChange={(e) => {
                  setColumnFilters([
                    ...columnFilters.filter((f) => f.id !== "name"),
                    { id: "name", value: e.target.value },
                  ]);
                }}
                className="max-w-sm"
              />

              {/* League filter */}
              <Select
                value={leagueFilter || "all"}
                onValueChange={(value) => {
                    setColumnFilters([
                        ...columnFilters.filter((f) => f.id !== "league"),
                        value !== "all" ? { id: "league", value } : undefined,
                    ].filter(Boolean) as ColumnFiltersState);
                }}
              >
                <SelectTrigger className="w-[200px]">
                    <SelectValue placeholder="Filter by League" />
                    </SelectTrigger>
                    <SelectContent>
                    <SelectItem value="all">All Leagues</SelectItem>
                    {leagues.data.map((league: { id: React.Key | null | undefined; name: string | number | bigint | boolean | React.ReactElement<unknown, string | React.JSXElementConstructor<any>> | Iterable<React.ReactNode> | React.ReactPortal | Promise<string | number | bigint | boolean | React.ReactPortal | React.ReactElement<unknown, string | React.JSXElementConstructor<any>> | Iterable<React.ReactNode> | null | undefined> | null | undefined; }) => (
                        <SelectItem key={league.id} value={String(league.name)}>
                        {league.name}
                        </SelectItem>
                    ))}
                    </SelectContent>
              </Select>
            </div>

          </div>

          {/* Table */}
          <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <DataTable
              columns={teamColumns({
                onViewTeam: handleViewTeam,
              })}
              data={teams.data}
              sorting={sorting}
              onSortingChange={setSorting}
              columnFilters={columnFilters}
              onColumnFiltersChange={setColumnFilters}
            />
          </div>
        </div>
      </div>
    </AdminLayout>
  );
}