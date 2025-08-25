"use client"
 
import { ColumnDef } from "@tanstack/react-table"
 

export type Import = {
  id: number
  endpoint: string
  response: string,
  lookup_at: string
}
 
export const columns: ColumnDef<Import>[] = [
  {
    accessorKey: "id",
    header: "Id",
  },
  {
    accessorKey: "endpoint",
    header: "Type",
  },
  {
    accessorKey: "response",
    header: "Status",

    cell: ({ getValue }) => {
      const response = getValue() as string;
          return response.length ? 'success' : 'failed';
      },
  },  
  {
    accessorKey: "lookup_at",
    header: "Imported At",
  },    

]