<template>
    <div class="col" v-for="events in groupedEventsByMonth">
        <VCalendar color="pink" :attributes="attributes(events)" :id="events[0].id" />
    </div>
</template>

<script setup>
const props = defineProps({
    events: {
        type: Array,
        required: true,
    },
})

import { stringToDate } from '@/services/couples';
// import { stringToDate } from '@/services/couples';
import { computed } from 'vue';

const groupedEventsByMonth = computed(() => {
    const groupedEvents = {};
    const array = props.events;
    array.forEach((event) => {
        const eventDate = new Date(event.event_date);
        const month = eventDate.getMonth();
        if (!groupedEvents[month]) {
            groupedEvents[month] = [];
        }
        groupedEvents[month].push(event);
    });
    return groupedEvents;
});

/**
 * Iterar por meses o pasarle solo los eventos de ese mes para que el objeto
 * ejemplo array<enero>[{}, {}] y poder mapearlo y agregarlo a un solo attrs
 */
const attributes = (events) => {
    const attrs = events.map((event) => {
        const attr = {
            id: event.id,
            dates: stringToDate(event.event_date),
            color: event.color,
            dot: true,
            popover: {
                label: event.description,
            },
        };
        return attr;
    })
    return attrs;
}
</script>

<style scoped>
.vc-container .vc-weekday-1,
.vc-container .vc-weekday-7 {
    color: #6366f1;
}
</style>