import { type ClassValue, clsx } from 'clsx';
import { twMerge } from 'tailwind-merge';

export function cn(...inputs: ClassValue[]) {
    return twMerge(clsx(inputs));
}

export function formatKickoffTime(datetime: string | Date): string {
  const date = typeof datetime === 'string' ? new Date(datetime) : datetime;

  return date.toLocaleString('en-GB', {
    dateStyle: 'medium',
    timeStyle: 'short'
  });
}