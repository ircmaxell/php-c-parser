#define RING_SIZE 256
typedef struct {
  int data[RING_SIZE];
  int head;
  int tail;
  int count;
} RingBuffer;
void ringInit(RingBuffer *rb) {
  rb->head = 0;
  rb->tail = 0;
  rb->count = 0;
}
int ringPush(RingBuffer *rb, int value) {
  if (rb->count == RING_SIZE) {
    return -1;
  }
  rb->data[rb->tail] = value;
  rb->tail = (rb->tail + 1) % RING_SIZE;
  rb->count = rb->count + 1;
  return 0;
}
int ringPop(RingBuffer *rb) {
  if (rb->count == 0) {
    return -1;
  }
  int value;
  value = rb->data[rb->head];
  rb->head = (rb->head + 1) % RING_SIZE;
  rb->count = rb->count - 1;
  return value;
}
