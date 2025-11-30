<script setup>
import { ref } from 'vue'
import { useForm } from '@inertiajs/vue3'
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

const form = useForm({
  ticker: ''
})

const etfs = ref([])

function addEtf() {
  if (!form.ticker.trim()) return
  form.post(('/wallet/etf'), {
    onSuccess: () => {
      etfs.value.push({
        ticker: form.ticker.toUpperCase()
      })
      form.reset()
    }
  })
}const props = defineProps({
  etfs: Array
});

function justDate(fullDate) {
  return fullDate ? fullDate.split('T')[0] : '';
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
            v-model="form.ticker"
            type="text"
            placeholder="What's the ticker?"
          />
          <Button @click="addEtf" :disabled="form.processing">
            Add +
          </Button>
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
          <TableRow v-for="(etfs, index) in props.etfs" :key="index">
            <TableCell>{{ etfs.ticker }}</TableCell>
            <TableCell>{{ justDate(etfs.created_at) }}</TableCell>
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

