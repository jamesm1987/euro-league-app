"use client"
 
import { ColumnDef } from "@tanstack/react-table"
 

export type Competition = {
  id: number
  name: string
  type: string
  country: string
  api_id: number
}
 
export const columns: ColumnDef<Competition>[] = [
  {
    accessorKey: "id",
    header: "Id",
  },
  {
    accessorKey: "key",
    header: "Key",
  },
  {
    accessorKey: "context",
    header: "Context",
  },
  {
    accessorKey: "points",
    header: "Points",
  },
  {
    accessorKey: "active",
    header: "Active",
  },
]