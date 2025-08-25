"use client";

import type { Competition } from '@/types';
import type { ColumnDef } from '@tanstack/react-table';

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

export const columns = ({ 
  onViewLeague,
}: { 
  onViewLeague: (competion: Competition) => void; 
}): ColumnDef<Competition>[] => [
  {
    accessorKey: "id",
    header: "Id",
  },
  {
    accessorKey: "name",
    header: "Name",
  },
  {
    accessorKey: "type",
    header: "Type",
  },
  {
    accessorKey: "country",
    header: "Country",
  },
  {
    accessorKey: "api_id",
    header: "API ID",
  },
  {
    id: 'actions',
    cell: ({ row }) => {
      const competition = row.original;

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
              onClick={() => onViewLeague(competition)}>
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

export type LeagueTable = {
  played: number
  team: string
  won: number
  drawn: number
  lost: number
  goal_difference: number
  points: number
}

export const leagueTableColumns: ColumnDef<LeagueTable>[] = [
  {
    id: "position",
    header: "Position",
    cell: ({ row }) => row.index + 1,
  },
  {
    accessorKey: "team",
    header: "Team",
  },
  {
    accessorKey: "played",
    header: "Pld",
  },  
  {
      accessorKey: "won",
      header: "W"
  },
  {
    accessorKey: "drawn",
    header: "D",
  },
  {
    accessorKey: "lost",
    header: "L",
  },  
  {
    accessorKey: "goal_difference",
    header: "GD"
  },
  {
    accessorKey: "points",
    header: "Pts"
  }     
]

export type ScoreTable = {
  team: string
  home_win: number
  away_win: number
  home_defeat: number
  away_defeat: number
  score_points: number
}

export const scoreTableColumns: ColumnDef<ScoreTable>[] = [
  {
    id: "position",
    header: "Position",
    cell: ({ row }) => row.index + 1,
  },
  {
    accessorKey: "team",
    header: "Team",
  },
  {
    accessorKey: "home_win",
    header: "Home Win",
  },
  {
    accessorKey: "away_win",
    header: "Away Win"
  },
  {
    accessorKey: "home_defeat",
    header: "Home Defeat",
  },
  {
    accessorKey: "away_defeat",
    header: "Away Defeat",
  },  
  {
    accessorKey: "points",
    header: "Bonus Points"
  } 
]

export type PointsTable = {
  team: string,
  played: number
  won: number
  drawn: number
  lost: number
  goal_difference: number
  points: number
  score_points: number
  trophy_points: number
  goalscorer_points: number
  total_points: number
  formatted_price: string
}

export const pointsTableColumns: ColumnDef<PointsTable>[] = [
  {
    id: "position",
    header: "#",
    cell: ({ row }) => row.index + 1,
  },
  {
    accessorKey: "team",
    header: "Team",
  },  
  {
    accessorKey: "played",
    header: "Pld",
  },
  {
      accessorKey: "won",
      header: "W"
  },
  {
    accessorKey: "drawn",
    header: "D",
  },
  {
    accessorKey: "lost",
    header: "L",
  },  
  {
    accessorKey: "goal_difference",
    header: "GD"
  },
  {
    accessorKey: "points",
    header: "Pts"
  },
  {
    accessorKey: "score_points",
    header: "Score Pts"
  },
  {
    accessorKey: "trophy_points",
    header: "Trophy Bonus"
  },
  {
    accessorKey: "goalscorer_points",
    header: "Goalscorer Pts"
  },
  {
    accessorKey: "total_points",
    header: "Total Pts"
  },
  {
    accessorKey: "price",
    header: "Price"
  }            
]



 