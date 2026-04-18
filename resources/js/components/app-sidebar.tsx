import { Link } from '@inertiajs/react';
import { BarChart3, BookOpen, LayoutGrid, MapPin, MapPinned, Users } from 'lucide-react';
import AppLogo from '@/components/app-logo';
import { NavMain } from '@/components/nav-main';
import { NavUser } from '@/components/nav-user';
import {
    Sidebar,
    SidebarContent,
    SidebarFooter,
    SidebarHeader,
    SidebarMenu,
    SidebarMenuButton,
    SidebarMenuItem,
} from '@/components/ui/sidebar';
import { dashboard } from '@/routes';
import type { NavItem } from '@/types';

const mainNavItems: NavItem[] = [
    {
        title: 'Dashboard',
        href: dashboard(),
        icon: LayoutGrid,
    },
    {
        title: 'Counties',
        href: '/admin/counties',
        icon: MapPinned,
    },
    {
        title: 'Constituencies',
        href: '/admin/constituencies',
        icon: MapPin,
    },
    {
        title: 'Wards',
        href: '/admin/wards',
        icon: MapPin,
    },
    {
        title: 'Aspirants',
        href: '/admin/aspirants',
        icon: Users,
    },
    {
        title: 'Polls',
        href: '/admin/polls',
        icon: BarChart3,
    },
    {
        title: 'Rankings',
        href: '/rankings',
        icon: BookOpen,
    },
];

export function AppSidebar() {
    return (
        <Sidebar collapsible="icon" variant="inset">
            <SidebarHeader>
                <SidebarMenu>
                    <SidebarMenuItem>
                        <SidebarMenuButton size="lg" asChild>
                            <Link href={dashboard()} prefetch>
                                <AppLogo />
                            </Link>
                        </SidebarMenuButton>
                    </SidebarMenuItem>
                </SidebarMenu>
            </SidebarHeader>

            <SidebarContent>
                <NavMain items={mainNavItems} />
            </SidebarContent>

            <SidebarFooter>
                <NavUser />
            </SidebarFooter>
        </Sidebar>
    );
}
