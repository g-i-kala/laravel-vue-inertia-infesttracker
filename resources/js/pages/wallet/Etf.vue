<script setup>
import { ref } from 'vue'
import { Input } from '@/components/ui/input'
import { Button } from '@/components/ui/button'
import {
  Table,
  TableBody,
  TableCaption,
  TableCell,
  TableHead,
  TableHeader,
  TableRow,
} from '@/components/ui/table'
import WalletLayout from '../../layouts/wallet/WalletLayout.vue'

defineOptions({ layout: WalletLayout })

const newTicker = ref('')
const etfs = ref([])

function addEtf() {
  if (!newTicker.value.trim()) return
  etfs.value.push({
    ticker: newTicker.value.toUpperCase()
  })
  newTicker.value = ''
}
</script>


<template>
  <div class="flex h-full flex-1 flex-col gap-4 overflow-x-auto rounded-xl p-4">
    <!-- Header -->
    <div class="my-4 rounded-xl border border-gray-200 p-4">
      <h1 class="text-2xl font-semibold">My ETFs</h1>
    </div>

    <!-- Add form -->
    <div class="my-4 rounded-xl border border-gray-200 p-4">
      <label class="text-xs pl-1 text-gray-500 space-y-2" for="etfTicker">
        Search
        <div class="flex gap-2 mt-2">
          <Input
            id="etfTicker"
            v-model="newTicker"
            type="text"
            placeholder="What's the ticker?"
          />
          <Button @click="addEtf">Add +</Button>
        </div>
      </label>
    </div>

    <!-- ETF list -->
    <div class="my-4 rounded-xl border border-gray-200 p-4">
      <Table>
        <TableCaption>Your tracked ETFs</TableCaption>
        <TableHeader>
          <TableRow>
            <TableHead>Ticker</TableHead>
            <TableHead>Symbol</TableHead>
            <TableHead>Name</TableHead>
            <TableHead>Price</TableHead>
            <TableHead>Change</TableHead>
            <TableHead>Change %</TableHead>
            <TableHead>50D/Avg</TableHead>
            <TableHead>200D/Avg</TableHead>
            <TableHead>3Mo Ret</TableHead>
            <TableHead>YTD Ret</TableHead>
            
          </TableRow>
        </TableHeader>
        <TableBody>
          <TableRow v-for="(etf, index) in etfs" :key="index">
            <TableCell>{{ etf.ticker }}</TableCell>
            <TableCell>{{ etf.addedAt }}</TableCell>
          </TableRow>
          <TableRow v-if="!etfs.length">
            <TableCell colspan="2" class="text-gray-400">
              No ETFs added yet.
            </TableCell>
          </TableRow>
        </TableBody>
      </Table>
    </div>
  </div>
</template>

