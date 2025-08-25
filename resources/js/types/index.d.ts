import { LucideIcon } from 'lucide-react';
import type { Config } from 'ziggy-js';

export interface Auth {
    user: User;
}

export interface BreadcrumbItem {
    title: string;
    href: string;
}

export interface NavGroup {
    title: string;
    items: NavItem[];
}

export interface NavItem {
    title: string;
    href: string;
    icon?: LucideIcon | null;
    isActive?: boolean;
}

export interface SharedData {
    name: string;
    quote: { message: string; author: string };
    auth: Auth;
    ziggy: Config & { location: string };
    sidebarOpen: boolean;
    [key: string]: unknown;
}

export interface User {
    id: number;
    name: string;
    email: string;
    avatar?: string;
    email_verified_at: string | null;
    created_at: string;
    updated_at: string;
    [key: string]: unknown;
}

export type Competition = {
    id: number
    name: string
    type: string
    country: string
    api_id: number
}

export type Team = {
    id: number
    name: string
    league: string
    country: string
    price: number
    formatted_price: string
    fixtures: Fixture[]
    total_points: number | null
    goal_differnce: number | null
    win_count: number | null
    draw_count: number | null
    score_home_win_count: number | null
    score_home_defeat_count: number | null
    score_away_win_count: number | null
    score_away_defeat_count: number | null    
    api_id: number
}

export type Fixture = {
    id: number
    home: string
    away: string
    result: string
    league: string
    country: string
    is_proceessed: boolean
    kickoff_at: string
}

export type Import = {
    id: number
    type: string
    status: string
    response: string
}

export type GameRule = {
    id: number
    key: string
    description: string
    context: string
    margin: number
    points: number
    active: boolean
}