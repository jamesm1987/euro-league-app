import { SidebarInset } from '@/components/ui/sidebar';
import * as React from 'react';

interface AdminContentProps extends React.ComponentProps<'main'> {
    variant?: 'header' | 'sidebar';
}

export function AdminContent({ variant = 'header', children, ...props }: AdminContentProps) {
    if (variant === 'sidebar') {
        return <SidebarInset {...props}>{children}</SidebarInset>;
    }

    return (
        <main className="mx-auto flex h-full w-full max-w-7xl flex-1 flex-col gap-4 rounded-xl" {...props}>
            {children}
        </main>
    );
}
