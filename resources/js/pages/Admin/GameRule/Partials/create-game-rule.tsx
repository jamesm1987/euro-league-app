"use client"

import * as React from "react";
import { router } from "@inertiajs/react";
import  useMediaQuery from "@/hooks/use-media-query";

import { Button } from "@/components/ui/button";
import { Switch } from "@/components/ui/switch";
import {
  Dialog, DialogContent, DialogDescription, DialogHeader,
  DialogTitle, DialogTrigger,
} from "@/components/ui/dialog";
import {
  Drawer, DrawerClose, DrawerContent, DrawerDescription,
  DrawerFooter, DrawerHeader, DrawerTitle, DrawerTrigger,
} from "@/components/ui/drawer";
import { Input } from "@/components/ui/input";
import { Textarea } from "@/components/ui/textarea";
import { Label } from "@/components/ui/label";
import { Select, SelectTrigger, SelectContent, SelectItem, SelectValue } from "@/components/ui/select";

export function CreateGameRuleModal() {
  const [open, setOpen] = React.useState(false)
  const isDesktop = useMediaQuery("(min-width: 768px)")
  const [formData, setFormData] = React.useState({
    key: "",
    context: "",
    margin: "",
    points: "",
    active: false

  });

  const contexts = [
    'result_points',
    'score_points',
    'goalscorer_points',
    'trophy_points'
  ];

  const handleChange = (e: React.ChangeEvent<HTMLInputElement | HTMLTextAreaElement>) => {
    const { name, type, checked, value } = e.target;
    setFormData(prev => ({
      ...prev,
      [name]: type === "checkbox" ? checked : value,
    }));
  };

  const handleSubmit = (e: React.FormEvent) => {
    e.preventDefault()

    router.post("/admin/settings/rules", formData, {
      onSuccess: () => {
        setOpen(false)
        setFormData({key: "", description: "", context: "", margin: "", points: "", active: false})
        // Optionally redirect to edit page if backend returns `user.id`
        // router.visit(`/users/${newUserId}/edit`)
      },
    })
  }

  const Form = (
    <form onSubmit={handleSubmit} className="grid items-start gap-6 px-4">
      <div className="grid gap-3">
        <Label htmlFor="name">Key</Label>
        <Input
          id="key"
          name="key"
          value={formData.key}
          onChange={handleChange}
          required
        />
      </div>
      <div className="grid gap-3">
        <Label htmlFor="description">Description</Label>
        <Textarea
          id="description"
          name="description"
          value={formData.description}
          onChange={handleChange}
          required
        />
      </div>
      <div className="grid gap-3">
        <Label htmlFor="type">Type</Label>
        <Select id="type"
        name="context"
        value={formData.context}
        onValueChange={( value ) => 
          setFormData((prev) => ({ ...prev, context: value }))
        }
        >
        <SelectTrigger className="w-[200px]">
            <SelectValue placeholder="Select context" />
            </SelectTrigger>
            <SelectContent>
            {contexts.map((ctx, id) => (
                <SelectItem key={id} value={ctx}>
                  {ctx}
                </SelectItem>
            ))}
            </SelectContent>
        </Select>
      </div>

     {formData.context === "score_points" && (
        <div className="grid gap-3">
          <Label htmlFor="margin">Margin</Label>
          <Input
            id="margin"
            name="margin"
            value={formData.margin}
            type="number"
            onChange={handleChange}
            required
          />
        </div>
      )}  

      <div className="grid gap-3">
        <Label htmlFor="points">Points</Label>
        <Input
          id="points"
          name="points"
          value={formData.points}
          onChange={handleChange}
          required
        />
      </div>   

      <div className="grid gap-3">
        <Label htmlFor="active">Active</Label>

        <Switch
            checked={formData.active}
            onCheckedChange={(value) => 
              setFormData((prev) => ({ ...prev, active: value}))
            }
          />
      </div>            
      <Button type="submit">Create</Button>
    </form>
  )

  if (isDesktop) {
    return (
      <Dialog open={open} onOpenChange={setOpen}>
        <DialogTrigger asChild>
          <Button>Create Rule</Button>
        </DialogTrigger>
        <DialogContent className="sm:max-w-[425px]">
          <DialogHeader>
            <DialogTitle>Create Rule</DialogTitle>
            <DialogDescription>
              Enter the rule details
            </DialogDescription>
          </DialogHeader>
          {Form}
        </DialogContent>
      </Dialog>
    )
  }

  return (
    <Drawer open={open} onOpenChange={setOpen}>
      <DrawerTrigger asChild>
        <Button>Create Rule</Button>
      </DrawerTrigger>
      <DrawerContent>
        <DrawerHeader className="text-left">
          <DrawerTitle>Create Rule</DrawerTitle>
          <DrawerDescription>
            Enter the rule details
          </DrawerDescription>
        </DrawerHeader>
        {Form}
        <DrawerFooter>
          <DrawerClose asChild>
            <Button variant="outline">Cancel</Button>
          </DrawerClose>
        </DrawerFooter>
      </DrawerContent>
    </Drawer>
  )
}