<script setup lang="ts">
import Menubar from '@/components/ui/menubar/Menubar.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { dashboard } from '@/routes';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import WalletLayout from '../../layouts/wallet/WalletLayout.vue';
defineOptions({layout: WalletLayout});


const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Wallet',
        href: '/wallet',
    },
];
</script>

<template>
  <h1 class="text-2xl font-semibold mb-4">Wallet Overview</h1>
  <p>This is the main wallet dashboard.</p>
</template>
