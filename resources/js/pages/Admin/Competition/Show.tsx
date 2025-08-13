"use client";

import * as React from "react";
import { Link, Head, router, usePage } from "@inertiajs/react";
import AdminLayout from "@/layouts/admin-layout";
import { type BreadcrumbItem, Competition } from "@/types";
import { leagueTableColumns } from "./columns";
import { DataTable } from "@/components/ui/data-table";
import { Card, CardContent, CardHeader, CardTitle } from "@/components/ui/card";
import { Badge } from "@/components/ui/badge";
import { Button } from "@/components/ui/button";
import { Tabs, TabsContent, TabsList, TabsTrigger } from "@/components/ui/tabs";

interface ShowProps {
  competition: Competition;
}

const breadcrumbs: BreadcrumbItem[] = [
  {
    title: 'Competition',
    href: "/admin/competitions",
  },
];

export default function Show({ competition }: ShowProps) {

  return (
    <AdminLayout breadcrumbs={breadcrumbs}>
      <div className="py-12">
                   <Head title={`Admin – ${competition.data.name}`} />

            <div className="flex flex-col gap-6 p-6">
                {/* Breadcrumb and title */}
                <div>
                    <h1 className="text-3xl font-bold">{competition.data.name}</h1>
                    <p className="text-sm text-muted-foreground">
                        ID: #{competition.data.id} &middot; Last updated: {new Date(competition.data.updated_at).toLocaleString()}
                    </p>
                </div>

                {/* Info Card */}
                <Card>


                    <CardHeader>
                        <CardTitle>Competition Info</CardTitle>
                    </CardHeader>
                    <CardContent className="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm">
                        <div><strong>Country:</strong> {competition.data.country}</div>
                        
                    </CardContent>
                </Card>

            
                <Card>
                    <CardHeader><CardTitle>League Table</CardTitle></CardHeader>
                    <CardContent>
                        
                    </CardContent>
                </Card>
                
                {/* Actions */}
                <div className="flex gap-2 mt-4">
                    <Button variant="default">Edit</Button>
                    <Button variant="destructive">Delete</Button>
                </div>
            </div>
      </div>
    </AdminLayout>
  );
}