import { PlaceholderPattern } from '@/components/ui/placeholder-pattern';
import AppLayout from '@/layouts/app-layout';
import { type BreadcrumbItem, Team, Competition } from '@/types';
import { Head } from '@inertiajs/react';
import { Card, CardContent, CardHeader, CardTitle } from "@/components/ui/card";
import { Input } from "@/components/ui/input";
import { Select, 
    SelectContent, 
    SelectItem, 
    SelectTrigger, 
    SelectValue } from "@/components/ui/select";
import { Button } from "@/components/ui/button";
import { Checkbox } from "@/components/ui/checkbox";
import { Badge } from "@/components/ui/badge";
import { useState } from "react";

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Teams Picker',
        href: '/teams-picker',
    },
];

interface IndexProps {
    teams: Team[];
    leagues: Competition[],
    selected: number[],
    spent: number,
    budget: number
}

export default function Index({teams, leagues}: IndexProps) {

    const [leagueFilter, setLeagueFilter] = useState("");
    const [search, setSearch] = useState("");

    const filteredTeams = teams.filter((team) => {
        const nameMatch = team.name.toLowerCase().includes(search.toLowerCase());
        const leagueMatch = leagueFilter ? team.league === leagueFilter : true;
        return nameMatch && leagueMatch;
    });
    
    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Teams Picker" />
            <div className="flex h-full flex-1 flex-col gap-4 rounded-xl p-4 overflow-x-auto">
                <div className="grid auto-rows-min gap-4 md:grid-cols-1">
                    <div>
                        <h1 className="text-3xl"><strong>Pick your teams</strong></h1>

                        <Card>
                            <CardContent className="space-y-4">
                                {/* Filters */}
                                <div className="flex flex-col sm:flex-row gap-3">
                                <Select onValueChange={setLeagueFilter}>
                                    <SelectTrigger className="w-full sm:w-40">
                                    <SelectValue placeholder="Filter by League" />
                                    </SelectTrigger>
                                    <SelectContent>
                                        { leagues.map((league) => (
                                            <SelectItem key={league.id} value={league.name}>{league.name}</SelectItem>
                                        ))}
                                    </SelectContent>
                                </Select>

                                <Input
                                    placeholder="Search for a team..."
                                    className="w-full sm:flex-1"
                                    value={search}
                                    onChange={(e) => setSearch(e.target.value)}
                                />
                                </div>

                                {/* Selected Summary */}
                                <div className="bg-muted p-4 rounded-lg text-sm">
                                <div className="flex flex-col sm:flex-row justify-between gap-2 font-medium">
                                    <div>✅ Selected: 2 / 10</div>
                                    <div>💰 Budget Remaining: £109M</div>
                                </div>
                                <div className="mt-2 flex flex-wrap gap-2">
                                    <Badge variant="success">PL (2/2)</Badge>
                                    <Badge variant="outline">LALIGA (0/2)</Badge>
                                    <Badge variant="outline">SERIE A (0/2)</Badge>
                                    <Badge variant="outline">BUNDESLIGA (0/2)</Badge>
                                    <Badge variant="outline">LIGUE 1 (0/2)</Badge>
                                </div>
                                </div>

                                {/* Team Table */}
                                <div className="border rounded-lg overflow-hidden">
                                <div className="grid grid-cols-4 sm:grid-cols-5 gap-2 p-3 font-semibold text-sm bg-gray-100">
                                    <div>Team</div>
                                    <div className="hidden sm:block">League</div>
                                    <div className="text-center">Cost</div>
                                    <div className="text-center col-span-2 sm:col-span-1">Add</div>
                                </div>

                                {filteredTeams.map((team) => (
                                    <div
                                    key={team.name}
                                    className="grid grid-cols-4 sm:grid-cols-5 gap-2 p-3 items-center border-t text-sm"
                                    >
                                    <div className="flex items-center gap-2">
                                        <Checkbox id={team.name} />
                                        <label htmlFor={team.name}>{team.name}</label>
                                    </div>
                                    <div className="hidden sm:block">
                                        <Badge variant="secondary">{team.league}</Badge>
                                    </div>
                                    <div className="text-center">£{team.price}M</div>
                                    <div className="col-span-2 sm:col-span-1 text-center">
                                        <Button size="sm">Add</Button>
                                    </div>
                                    </div>
                                ))}
                                </div>
                            </CardContent>
                        </Card>
                    </div>

                </div>
            </div>
        </AppLayout>
    );
}
