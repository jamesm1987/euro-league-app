"use client";

import * as React from "react";
import { Link, Head, router,usePage } from "@inertiajs/react";
import AdminLayout from "@/layouts/admin-layout";
import { type BreadcrumbItem, Team } from "@/types";
import { Card, CardContent, CardHeader, CardTitle } from "@/components/ui/card";
import { Badge } from "@/components/ui/badge";
import { Button } from "@/components/ui/button";
import { Tabs, TabsContent, TabsList, TabsTrigger } from "@/components/ui/tabs";

interface ShowProps {
  team: Team;
}

const breadcrumbs: BreadcrumbItem[] = [
  {
    title: 'Team',
    href: "/admin/teams",
  },
];

export default function Index({ team }: ShowProps) {

  return (
    <AdminLayout breadcrumbs={breadcrumbs}>
      <div className="py-12">
                   <Head title={`Admin – ${team.data.name}`} />

            <div className="flex flex-col gap-6 p-6">
                {/* Breadcrumb and title */}
                <div>
                    <h1 className="text-3xl font-bold">{team.data.name}</h1>
                    <p className="text-sm text-muted-foreground">
                        ID: #{team.data.id} &middot; Last updated: {new Date(team.data.updated_at).toLocaleString()}
                    </p>
                </div>

                {/* Info Card */}
                <Card>
                    <CardHeader>
                        <CardTitle>Team Info</CardTitle>
                    </CardHeader>
                    <CardContent className="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm">
                        <div><strong>League:</strong> <Badge>{team.data.league}</Badge></div>
                        <div><strong>Country:</strong> {team.data.country}</div>
                        <div><strong>Price:</strong> {team.data.formatted_price}</div>
                    </CardContent>
                </Card>

                {/* Tabs for content */}
                <Tabs defaultValue="overview">
                    <TabsList>
                        <TabsTrigger value="overview">Overview</TabsTrigger>
                        <TabsTrigger value="activity">Activity</TabsTrigger>
                    </TabsList>

                    <TabsContent value="overview">
                        <Card>
                            <CardHeader><CardTitle>Team Overview</CardTitle></CardHeader>
                            <CardContent>
                                <p>Some overview content here like performance, notes, etc.</p>
                            </CardContent>
                        </Card>
                    </TabsContent>

                    <TabsContent value="activity">
                        <Card>
                            <CardHeader><CardTitle>Activity Log</CardTitle></CardHeader>
                            <CardContent>
                                <p>Coming soon...</p>
                            </CardContent>
                        </Card>
                    </TabsContent>
                </Tabs>

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