#include <stdio.h>
#include <stdlib.h>
#include <unistd.h>
#include <asm/io.h>
#define base 0x378

void delay (void) {
	int i;
	for (i=1;i<=10000000;i++);
	}

main (int argc, char **argv) {
	int i;
	if (ioperm(base,1,1))
	fprintf(stderr,"gagal koneksi %x\n",base),exit(1);

	for (i=1;i<=2;i++)
	{
	outb(0x08,base);delay();
	outb(0x04,base);delay();
	outb(0x02,base);delay();
	outb(0x01,base);delay();
	}
	}
