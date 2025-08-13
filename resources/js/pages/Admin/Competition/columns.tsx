"use client"
 
import { ColumnDef } from "@tanstack/react-table"
 

export type Competition = {
  id: number
  name: string
  type: string
  country: string
  api_id: number
}

export type LeagueTable = {
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

 
export const leagueTableColumns: ColumnDef<LeagueTable>[] = [
  {
    accessorKey: "played",
    header: "Pld",
  },
  {
      accessorKey: "won",
      header: "Won"
  },
  {
    accessorKey: "drawn",
    header: "Drawn",
  },
  {
    accessorKey: "lost",
    header: "Lost",
  },  
  {
    accessorKey: "goal_difference",
    header: "GD"
  },
  {
    accessorKey: "points",
    header: "Points"
  },
  {
    accessorKey: "score_points",
    header: "Score Points"
  },
  {
    accessorKey: "trophy_points",
    header: "Trophy Points"
  },  
  {
    accessorKey: "goalscorer_points",
    header: "Goalscorer Points"
  },    
  {
    accessorKey: "total_points",
    header: "Total Points"
  },   
  {
    accessorKey: "formatted_price",
    header: "Price [£m]"
  },       
]


 
export const columns: ColumnDef<Competition>[] = [
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
]