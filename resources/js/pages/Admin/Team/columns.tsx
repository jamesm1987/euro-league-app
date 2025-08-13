"use client";

import type { Team } from '@/types';
import type { ColumnDef } from '@tanstack/react-table';
import { formatKickoffTime } from "@/lib/utils"
 

import { MoreHorizontal } from "lucide-react";

import { Button } from "@/components/ui/button";
import {
  DropdownMenu,
  DropdownMenuContent,
  DropdownMenuItem,
  DropdownMenuLabel,
  DropdownMenuSeparator,
  DropdownMenuTrigger,
} from "@/components/ui/dropdown-menu";

export const teamColumns = ({ 
  onViewTeam,
}: { 
  onViewTeam: (team: Team) => void; 
}): ColumnDef<Team>[] => [
  {
    accessorKey: "id",
    header: "Id",
  },
  {
    accessorKey: "name",
    header: "Name",
  },
  {
    accessorKey: "league",
    header: "League",
  },
    {
    accessorKey: "formatted_price",
    header: "Price",
  },
  {
    accessorKey: "api_id",
    header: "API ID",
  },
  {
    id: 'actions',
    cell: ({ row }) => {
      const team = row.original;

      return (
        <DropdownMenu>
          <DropdownMenuTrigger asChild>
            <Button variant="ghost" className="h-8 w-8 p-0">
              <MoreHorizontal className="h-4 w-4" />
            </Button>
          </DropdownMenuTrigger>

          <DropdownMenuContent align="end">
            <DropdownMenuLabel>Actions</DropdownMenuLabel>
            <DropdownMenuSeparator />
            <DropdownMenuItem
              onClick={() => onViewTeam(team)}>
              View
            </DropdownMenuItem>
            <DropdownMenuItem>Edit</DropdownMenuItem>
            <DropdownMenuItem className="text-red-500">Delete</DropdownMenuItem>
          </DropdownMenuContent>
        </DropdownMenu>
      );
    },
  },

];

export type Fixture = {
  home: string
  away: string
  kickoff_at: string
  is_processed: boolean
}

export const fixtureColumns: ColumnDef<Fixture>[] = [
  {
    accessorKey: "home",
    header: "Home Team",
  },
  {
    accessorKey: "away",
    header: "Away Team",
  },
  {
    accessorKey: "kickoff_at",
    header: "Date",
      cell: ({ getValue }) => {
    const dateStr = getValue() as string;
      return formatKickoffTime(dateStr);
    },
  },

  {
    accessorKey: "is_processed",
    header: "Processed"
  },  
]

export type Result = {
  home: string
  away: string
  home_score: number | null
  away_score: number | null
  formatted_score: string | null
  kickoff_at: string
  is_processed: boolean
}

 
export const resultColumns: ColumnDef<Result>[] = [
  {
    accessorKey: "home",
    header: "Home Team",
  },
  {
      accessorKey: "formattedScore",
      header: "Score"
  },
  {
    accessorKey: "away",
    header: "Away Team",
  },
  {
    accessorKey: "result",
    header: "Result",
  },  
  {
    accessorKey: "is_processed",
    header: "Processed"
  },  
  {
    accessorKey: "kickoff_at",
    header: "Date",
      cell: ({ getValue }) => {
    const dateStr = getValue() as string;
      return formatKickoffTime(dateStr);
    },
  },  
]