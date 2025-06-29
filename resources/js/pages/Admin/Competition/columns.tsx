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