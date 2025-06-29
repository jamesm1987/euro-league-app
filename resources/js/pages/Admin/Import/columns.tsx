"use client"
 
import { ColumnDef } from "@tanstack/react-table"
 

export type Import = {
  id: number
  type: string
  status: string
  response: string
}
 
export const columns: ColumnDef<Import>[] = [
  {
    accessorKey: "id",
    header: "Id",
  },
  {
    accessorKey: "type",
    header: "Type",
  },
  {
    accessorKey: "status",
    header: "Status",
  },  

]