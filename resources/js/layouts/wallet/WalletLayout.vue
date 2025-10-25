<script setup lang="ts">
import Menubar from '@/components/ui/menubar/Menubar.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { dashboard } from '@/routes';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import WalletMenubar from '../../components/wallet/WalletMenubar.vue';


const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Wallet',
        href: '/wallet',
    },
];
</script>

<template>
    <Head title="Wallet" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div
            class="flex h-full flex-1 flex-col gap-4 overflow-x-auto rounded-xl p-4"
        ><div
                class="relative flex rounded-xl border border-sidebar-border/70 dark:border-sidebar-border"
            >
                <WalletMenubar />
            </div>
            
            <div
                class="relative min-h-[100vh] flex-1 rounded-xl border border-sidebar-border/70 md:min-h-min dark:border-sidebar-border"
            >
                <slot />
            </div>
        </div>
    </AppLayout>
</template>
