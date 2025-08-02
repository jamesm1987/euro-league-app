"use client"
 
import { ColumnDef } from "@tanstack/react-table"
import { formatKickoffTime } from "@/lib/utils"
 

export type Fixture = {
  id: number
  home: string
  away: string
  home_score: number | null
  away_score: number | null
  kickoff_at: string
  league: string
  country: string
  api_id: number
}
 
export const columns: ColumnDef<Fixture>[] = [
  {
    accessorKey: "id",
    header: "Id",
  },
  {
    accessorKey: "home",
    header: "Home Team",
  },
  {
    accessorKey: "away",
    header: "Away Team",
  },
  {
    accessorKey: "league",
    header: "League",
  },
  {
    accessorKey: "country",
    header: "Country",
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