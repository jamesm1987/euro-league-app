"use client"
 
import { ColumnDef } from "@tanstack/react-table"
 

export type Team = {
  id: number
  name: string
  competition: string
  price: string
  api_id: number
}
 
export const columns: ColumnDef<Team>[] = [
  {
    accessorKey: "id",
    header: "Id",
  },
  {
    accessorKey: "name",
    header: "Name",
  },
  {
    accessorKey: "api_id",
    header: "API ID",
  },
]