<script setup lang="ts">
import {
  NavigationMenu,
  NavigationMenuContent,
  NavigationMenuIndicator,
  NavigationMenuItem,
  NavigationMenuLink,
  NavigationMenuList,
  NavigationMenuTrigger,
  NavigationMenuViewport,
} from '@/components/ui/navigation-menu';
import { Link } from '@inertiajs/vue3'

</script>

<template>
  <NavigationMenu>
    <NavigationMenuList>
      <NavigationMenuItem>
        <NavigationMenuTrigger>ETF</NavigationMenuTrigger>
        <NavigationMenuContent>
            <NavigationMenuLink asChild>
            <Link href="/wallet/etf">Overview</Link>
          </NavigationMenuLink>
          <NavigationMenuLink asChild>
            <Link href="/wallet/etf">My List</Link>
          </NavigationMenuLink>
        </NavigationMenuContent>
      </NavigationMenuItem>
       <NavigationMenuItem>
        <NavigationMenuTrigger>Bonds</NavigationMenuTrigger>
        <NavigationMenuContent>
          <NavigationMenuLink asChild>
            <Link href="/wallet/bonds">Overview</Link>
          </NavigationMenuLink>
        </NavigationMenuContent>
      </NavigationMenuItem>
       <NavigationMenuItem>
        <NavigationMenuTrigger>Stocks</NavigationMenuTrigger>
        <NavigationMenuContent>
          <NavigationMenuLink asChild>
            <Link href="/wallet/stocks">Overview</Link>
          </NavigationMenuLink>
        </NavigationMenuContent>
      </NavigationMenuItem>
    </NavigationMenuList>
  </NavigationMenu>
</template>