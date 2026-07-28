import * as React from "react";
import { Slot } from "@radix-ui/react-slot";
import { cva, type VariantProps } from "class-variance-authority";
import { cn } from "@/lib/utils";

const buttonVariants = cva(
  "inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-full text-sm font-medium transition-all duration-300 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#d1a96f] focus-visible:ring-offset-2 focus-visible:ring-offset-[#04070b] disabled:pointer-events-none disabled:opacity-50",
  {
    variants: {
      variant: {
        default: "border border-white/15 bg-white/10 text-white hover:bg-white/20",
        primary: "border border-[#d1a96f]/40 bg-[#d1a96f]/10 text-[#f0c777] hover:bg-[#d1a96f]/20",
        ghost: "border border-white/10 bg-transparent text-zinc-200 hover:bg-white/10",
      },
      size: {
        default: "h-11 px-6 py-3",
        sm: "h-10 px-4 py-2",
        lg: "h-12 px-8 py-4 text-base",
      },
    },
    defaultVariants: {
      variant: "default",
      size: "default",
    },
  },
);

export interface ButtonProps extends React.ButtonHTMLAttributes<HTMLButtonElement>, VariantProps<typeof buttonVariants> {
  asChild?: boolean;
}

const Button = React.forwardRef<HTMLButtonElement, ButtonProps>(({ className, variant, size, asChild = false, ...props }, ref) => {
  const Comp = asChild ? Slot : "button";
  return <Comp className={cn(buttonVariants({ variant, size, className }))} ref={ref} {...props} />;
});

Button.displayName = "Button";

export { Button, buttonVariants };
